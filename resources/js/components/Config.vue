<template>
  <div class="config">
    <vs-button
      primary
      @click="setLocale(tempLocale)"
    >
      {{ locales[$i18n.locale] }}
    </vs-button>

    <vs-switch v-model="active">
      <template #off>
        {{ $t('config.theme.light') }}
      </template>
      <template #on>
        {{ $t('config.theme.dark') }}
      </template>
    </vs-switch>
  </div>
</template>

<script>
import store from '~/store'
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'

export default {
  name: 'Config',
  data: () => ({
    active: store.getters['theme/dark'],
  }),
  computed: {
    ...mapGetters({
      locale: 'lang/locale',
      locales: 'lang/locales'
    }),
    tempLocale () {
      return this.locale === 'ru' ? 'en' : 'ru'
    }
  },
  watch: {
    active: function (newVal, oldVal) {
      console.log(this.active)
      store.dispatch('theme/saveTheme', newVal)
    }
  },
  created() {
    console.log(this.locales)
  },
  methods: {
    setLocale (locale) {
      if (this.$i18n.locale !== locale) {
        loadMessages(locale)
        this.$store.dispatch('lang/setLocale', { locale })
      }
    }
  }
}
</script>

<style scoped>

</style>
