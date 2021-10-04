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
      },
      {
        path: 'airports',
        component: { render: (c) => c('router-view') },
        children: [
          { path: '', redirect: { name: 'dashboard.airports.index' } },
          {
            path: 'index', name: 'dashboard.airports.index', component: page('dashboard/airports/index.vue')
          }
        ]
      },
      {
        path: 'room_types',
        component: { render: (c) => c('router-view') },
        children: [
          { path: '', redirect: { name: 'dashboard.room_types.index' } },
          {
            path: 'index', name: 'dashboard.room_types.index', component: page('dashboard/room_types/index.vue')
          }
        ]
      },
      {
        path: 'companies',
        component: { render: (c) => c('router-view') },
        children: [
          { path: '', redirect: { name: 'dashboard.companies.index' } },
          {
            path: 'index', name: 'dashboard.companies.index', component: page('dashboard/companies/index.vue')
          }
        ]
      },
      {
        path: 'samples',
        component: { render: (c) => c('router-view') },
        children: [
          { path: '', redirect: { name: 'dashboard.samples.index' } },
          {
            path: 'index', name: 'dashboard.samples.index', component: page('dashboard/samples/index.vue')
          },
          {
            path: 'edit/:id', name: 'dashboard.samples.edit', component: page('dashboard/samples/edit.vue')
          }
        ]
      }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
