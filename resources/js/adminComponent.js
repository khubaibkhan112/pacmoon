
import { createApp } from 'vue';
import pointsIndex from './components/points/Index.vue';
import questsIndex from './components/quests/QuestIndex.vue';
import dashboard from './components/dashboard/Dashboard.vue';

const app = createApp({});
app.component('pointsIndex', pointsIndex);
app.component('questsIndex', questsIndex);
app.component('dashboard', dashboard);


export default app;
