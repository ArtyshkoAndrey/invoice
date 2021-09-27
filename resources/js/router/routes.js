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
        path: '/resort',
        component: { render: (c) => c('router-view') },
        children: [
          {
            path: '', name: 'dashboard.resort.index', component: page('dashboard/resort/index.vue')
          }
        ]
      }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
