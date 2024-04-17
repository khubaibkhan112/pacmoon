
import { createApp } from 'vue';
import pointsIndex from './components/points/Index.vue';
// import pointModel from './components/points/PointModel.vue';

const app = createApp({});
app.component('pointsIndex', pointsIndex);
// app.component('pointModel', pointModel);


export default app;
