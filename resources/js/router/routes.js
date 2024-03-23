function page(path) {
  return () =>
    import(/ webpackChunkName: '' / `@/${path}`).then(
      m => m.default || m
    );
}

export default [
  // Auth routes
  // {
  //   path: "/",
  //   name: "welcome",
  //   component: page("auth/login.vue")
  // },
  
  {
    path: "/welcome",
    name: "home",
    component: page("components/ExampleComponent.vue")
  },
];