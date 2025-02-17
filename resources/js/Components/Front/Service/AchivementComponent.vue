<script setup>
import { ref, onMounted } from 'vue';

const counters = ref([
  { label: 'Happy Clients', value: 0, target: 120 },
  { label: 'Completed Projects', value: 0, target: 75 },
  { label: 'Working Experience', value: 0, target: 5 },
  { label: 'Your Choice', value: 0, target: 50 }
]);

const animateCounters = () => {
  counters.value.forEach((counter) => {
    let current = 0;
    const step = Math.ceil(counter.target / 100);
    const interval = setInterval(() => {
      current += step;
      if (current >= counter.target) {
        current = counter.target;
        clearInterval(interval);
      }
      counter.value = current;
    }, 30);
  });
};

onMounted(() => {
  animateCounters();
});
</script>

<template>
  <section class="mh-skills" id="mh-skills">
    <div class="home-v-img">
      <div class="container">
        <div class="row text-center" style="margin: 50px 0;">
          <div class="col-sm-12">
            <h2 class="mb-5 wow fadeInUp" data-wow-duration="0.8s"
            data-wow-delay="0.2s">Our Achievements</h2>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12" v-for="(counter, index) in counters" :key="index">
            <div class="codearif-achivement wow fadeInUp" data-wow-duration="0.8s"
            data-wow-delay="0.5s">
              <h3 class="counter">{{ counter.value }}</h3>
              <p class="counter-label">{{ counter.label }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.codearif-achivement{
  background: #fff;
  padding: 20px;
  border-radius: 5px;
  margin: 15px 0;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.codearif-achivement:hover,
.codearif-achivement:active {
    background-color: #0bceaf;
    color: white;
}

.counter-box:hover {
  transform: translateY(-10px);
}

.counter {
  font-size: 40px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
}

.counter-label {
  font-size: 18px;
  color: #777;
}

.codearif-achivement:hover h3,
.codearif-achivement:active h3,
.codearif-achivement:hover p,
.codearif-achivement:active p {
    color: white;
}

@media (max-width: 768px) {
  .counter-box {
    padding: 15px;
  }
  .counter {
    font-size: 32px;
  }
  .counter-label {
    font-size: 16px;
  }
}
</style>
