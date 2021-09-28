function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/login', name: 'login', component: page('auth/login.vue') },

  {
    path: '/',
    component: page('dashboard/auth.vue'),
    children: [
      { path: '', redirect: { name: 'dashboard.index' } },
      { path: 'index', name: 'dashboard.index', component: page('dashboard/index.vue') },
      {
        path: 'resorts',
        component: { render: (c) => c('router-view') },
        children: [
          { path: '', redirect: { name: 'dashboard.resorts.index' } },
          {
            path: 'index', name: 'dashboard.resorts.index', component: page('dashboard/resorts/index.vue')
          }
        ]
      }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
