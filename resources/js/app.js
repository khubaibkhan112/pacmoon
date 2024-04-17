import "./bootstrap";


import { createApp } from "vue";
import App from "./components/App.vue";
import ExampleComponent from "./components/ExampleComponent.vue"; // Import the new component

const app = createApp(App);

// Register the new component
app.component("example-component", ExampleComponent);

app.mount("#app");
