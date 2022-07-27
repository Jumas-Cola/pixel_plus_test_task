<template>
  <select name="window" id="window" @change="windowSelected">
    <option value="day">Day</option>
    <option value="week">Week</option>
    <option value="month">Month</option>
  </select>
  <PlotComponent :data="data" />
</template>

<script>
import PlotComponent from './components/PlotComponent.vue';

export default {
  name: 'App',
  components: {
    PlotComponent,
  },
  data() {
    return {
      data: [],
      window: 'week',
    };
  },
  created() {
    fetch(`http://localhost:8000/src?window=${this.window}`)
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        this.data = data;
      });
  },
  watch: {
    window() {
      fetch(`http://localhost:8000/src?window=${this.window}`)
        .then((response) => {
          return response.json();
        })
        .then((data) => {
          this.data = data;
        });
    },
  },
  methods: {
    windowSelected(event) {
      this.window = event.target.value;
    },
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
