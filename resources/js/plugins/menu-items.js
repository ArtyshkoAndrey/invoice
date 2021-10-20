class Items {
  constructor() {
    this.links = []
  }

  add(title, name, path, icon) {
    const item = new Item(title, name, path, icon)
    this.links.push(item)
  }
}

class Item {
  constructor(title, name, path, icon) {
    this.title = title
    this.name = name
    this.path = path
    this.icon = icon
  }
}

const items = new Items()
items.add(
  'menu.invoice.title',
  'dashboard.invoice.index',
  '/invoice/index',
  {
    type: 'solid',
    name: 'home'
  }
)

items.add(
  'menu.resorts.title',
  'dashboard.resorts.index',
  '/resorts/index',
  {
    type: 'regular',
    name: 'home-circle'
  }
)
items.add(
  'menu.airports.title',
  'dashboard.airports.index',
  '/airports/index',
  {
    type: 'solid',
    name: 'plane-alt'
  }
)

items.add(
  'menu.hotels.title',
  'dashboard.hotels.index',
  '/hotels/index',
  {
    type: 'solid',
    name: 'building-house'
  }
)

items.add(
  'menu.room_types.title',
  'dashboard.room_types.index',
  '/room_types/index',
  {
    type: 'regular',
    name: 'hotel'
  }
)

items.add(
  'menu.companies.title',
  'dashboard.companies.index',
  '/companies/index',
  {
    type: 'regular',
    name: 'diamond'
  }
)

items.add(
  'menu.samples.title',
  'dashboard.samples.index',
  '/samples/index',
  {
    type: 'solid',
    name: 'compass'
  }
)

items.add(
  'menu.transports.title',
  'dashboard.transports.index',
  '/transports/index',
  {
    type: 'solid',
    name: 'car'
  }
)

items.add(
  'menu.users.title',
  'dashboard.users.index',
  '/users/index',
  {
    type: 'solid',
    name: 'user'
  }
)

// items.add(
//   'Создать',
//   'create',
//   '/create',
//   {
//     type: 'solid',
//     name: 'plus-square'
//   }
// )

export default items
