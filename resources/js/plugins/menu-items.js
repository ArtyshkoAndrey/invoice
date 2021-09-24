import i18n from './i18n'

class Items {
  constructor () {
    this.links = []
  }

  add (title, name, path, icon) {
    const item = new Item(title, name, path, icon)
    this.links.push(item)
  }
}

class Item {
  constructor (title, name, path, icon) {
    this.title = title
    this.name = name
    this.path = path
    this.icon = icon
  }
}

const items = new Items()
items.add(
  'menu.index.title',
  'dashboard.index',
  '/index',
  {
    type: 'solid',
    name: 'home'
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
