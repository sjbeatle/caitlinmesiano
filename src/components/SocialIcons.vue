<template>
  <ul class="social-icons group">
    <li
      class="social-icons__item"
      v-for="icon in icons"
    >

      <a
        class="social-icons__item__link"
        :href="icon.url"
        :title="icon.title"
        target="_blank"
      >
        <span
          class="social-icons__item__link__icon"
          :class="icon.faClass"
        ></span>
      </a>
    </li>
  </ul>
</template>

<script>
  export default {
    name: 'header',
    data() {
      return {
        icons: [
          {
            title: 'Facebook',
            url: 'https://www.facebook.com/CaitlinMesiano/',
            faClass: 'fa fa-facebook-square',
          },
          {
            title: 'YouTube',
            url: 'https://www.youtube.com/channel/UCXUokRK8SCRzA-OoaJOmLkg',
            faClass: 'fa fa-youtube-square',
          },
          {
            title: 'Instagram',
            url: 'https://www.instagram.com/caitlinmesiano/',
            faClass: 'fa fa-instagram',
          },
          {
            title: 'LinkedIn',
            url: 'https://www.linkedin.com/in/caitlin-mesiano-b5a54b108/',
            faClass: 'fa fa-linkedin-square',
          },
        ],
      };
    },
  };
</script>

<style lang="scss">
  .social-icons {
    font-size: 2.5rem;
    line-height: 1;

    &__item {
      float: left;
      margin: 0 .8rem;

      &:first-of-type {
        margin-left: 0;
      }

      &:last-of-type {
        margin-right: 0;
      }

      &__link {
        display: block;
        color: #fff;
        text-decoration: none;
        @include transition(color);

        &:hover,
        &:active,
        &:focus {
          color: $accent-blue;
        }

        &:focus {
          outline: 2px dashed $accent-blue;
          outline-offset: 2px;
        }
      }
    }
  }
</style>
