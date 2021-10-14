function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
  { path: '/login', name: 'login', component: page('auth/login.vue') },

  {
    path: '/',
    component: page('dashboard/auth.vue'),
    children: [
      { path: '', redirect: { name: 'dashboard.invoice.index' } },
      { path: 'index', name: 'dashboard.index',  redirect: { name: 'dashboard.invoice.index' } },
      {
        path: 'invoice',
        component: { render: (c) => c('router-view') },
        alias: 'dashboard.invoice.index',
        children: [
          { path: '', redirect: { name: 'dashboard.invoice.index' } },
          {
            path: 'index', name: 'dashboard.invoice.index', component: page('dashboard/invoice/index.vue')
          },
          {
            path: 'create', name: 'dashboard.invoice.create', component: page('dashboard/invoice/create.vue')
          },
          {
            path: 'show/:id', name: 'dashboard.invoice.show', component: page('dashboard/invoice/show.vue')
          },
          {
            path: 'edit/:id', name: 'dashboard.invoice.edit', component: page('dashboard/invoice/edit.vue')
          }
        ]
      },
      {
        path: 'resorts',
        component: { render: (c) => c('router-view') },
        alias: 'dashboard.resorts.index',
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
        alias: 'dashboard.airports.index',
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
        alias: 'dashboard.room_types.index',
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
        alias: 'dashboard.companies.index',
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
        alias: 'dashboard.samples.index',
        children: [
          { path: '', redirect: { name: 'dashboard.samples.index' } },
          {
            path: 'index', name: 'dashboard.samples.index', component: page('dashboard/samples/index.vue')
          },
          {
            path: 'edit/:id', name: 'dashboard.samples.edit', component: page('dashboard/samples/edit.vue')
          }
        ]
      },
      {
        path: 'transports',
        component: { render: (c) => c('router-view') },
        alias: 'dashboard.transports.index',
        children: [
          { path: '', redirect: { name: 'dashboard.transports.index' } },
          {
            path: 'index', name: 'dashboard.transports.index', component: page('dashboard/transports/index.vue')
          }
        ]
      }
    ]
  },

  { path: '*', component: page('errors/404.vue') }
]
