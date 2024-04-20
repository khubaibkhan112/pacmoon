
import { createApp } from 'vue';
import pointsIndex from './components/points/Index.vue';
import questsIndex from './components/quests/QuestIndex.vue';

const app = createApp({});
app.component('pointsIndex', pointsIndex);
app.component('questsIndex', questsIndex);


export default app;
