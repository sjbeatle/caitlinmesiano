<template>
  <nav>
    <ul class="nav group">
      <li
        class="nav__item"
        v-for="item in items"
      >
        <router-link
          class="nav__item__link"
          :class="{ 'nav__item__link--selected': $route.path === item.route }"
          :to="item.route"
        >{{ item.label }}</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
  export default {
    name: 'main-nav',
    data() {
      return {
        items: [
          {
            label: 'Home',
            route: '/',
          },
          {
            label: 'Galleries',
            route: '/galleries',
          },
          {
            label: 'Resume',
            route: '/resume',
          },
          {
            label: 'Media',
            route: '/media',
          },
          {
            label: 'Contact',
            route: '/contact',
          },
        ],
      };
    },
  };
</script>

<style lang="scss">
  .nav {
    position: relative;

    &__item {
      float: left;
      padding: 0 ($header-pad / 2);

      &:first-of-type {
        padding-left: 0;
      }

      &:last-of-type {
        padding-right: 0;
      }

      &__link {
        color: #ffffff;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 300;
        line-height: 1;
        background-color: transparent;
        padding: ($header-pad / 2) $header-pad;
        @include border-radius(5px);
        @include transition(all);

        &:hover,
        &:focus,
        &:active {
          color: #ffffff;
          outline: none;
          background-color: rgba(#ffffff, .2);
        }

        &:active,
        &--selected,
        &--selected:focus {
          background-color: rgba(#54c8d8, .5);
        }
      }

    }
  }
</style>
