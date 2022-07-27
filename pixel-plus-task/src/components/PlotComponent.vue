<template>
  <div class="hello">
    <LineChart :chartData="plotData" />
  </div>
</template>

<script>
import { LineChart } from 'vue-chart-3';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

export default {
  name: 'PlotComponent',
  components: { LineChart },
  props: {
    data: Array,
  },
  watch: {
    data() {
      this.plotData = {
        labels: this.data.map((item) => item.date),
        datasets: [
          {
            label: 'Current',
            data: this.data.map((item) => item.value),
            borderColor: 'rgba(85, 112, 192, 0.3)',
          },
          {
            label: 'Slice Avg',
            data: this.data.map((item) => item.avg),
            borderColor: 'rgba(75, 92, 92)',
          },
        ],
      };
    },
  },
  data() {
    return {
      plotData: {},
    };
  },
};
</script>
