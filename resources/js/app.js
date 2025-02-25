import {createInertiaApp, router} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {createApp,h} from 'vue';
import {ZiggyVue} from '../../vendor/tightenco/ziggy';

//progress bar
import NProgress from 'nprogress';

//toast
import './Assets/js/toast.js';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";

//data-table
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({
        el,
        App,
        props,
        plugin
    }) {
        return createApp({
                render: () => h(App, props)
            })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toastify)
            .component('EasyDataTable', Vue3EasyDataTable)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: '#ff4500',
        includeCSS: false, // Disable default styles
        showSpinner: false,
    },
});

router.on('start', () => {
    NProgress.start();
});


router.on('progress', (event) => {
    if (event.detail.progress && event.detail.progress.percentage) {
        NProgress.set(event.detail.progress.percentage / 100);
    }
});

router.on('finish', () => {
    NProgress.done();
});
