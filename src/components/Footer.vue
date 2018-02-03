<template>
  <footer class="footer">
    <div class="footer__inner">
      <div class="footer__inner__copyright">
        <span title="Copyright" class="fa fa-copyright"></span>
        Caitlin Mesiano
      </div>
      <SocialIcons />
    </div>
  </footer>
</template>

<script>
  export default {
    name: 'footer',
  };
</script>

<style lang="scss">
  .footer {
    padding: $header-pad;
    padding-bottom: $header-pad * 2;
    background-color: rgba($accent-blue, .9);
    color: #ffffff;
    z-index: 10;

    &__inner {
      &__copyright {
        font-size: 1.6rem;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 1.6rem;
      }
    }

    .social-icons {
      text-align: center;

      &__item {
        float: none;
        display: inline-block;

        &__link {

          $complement: complement(#54c8d8);

          &:hover,
          &:active,
          &:focus {
            color: $complement;
          }

          &:focus {
            outline-color: $complement;
          }
        }
      }

    }
  }

  @media (min-width: 475px) {
    .footer {
      padding-bottom: $header-pad;

      &__inner {
        @include flexbox();
        @include align-items(center);
        max-width: 1560px;
        margin: 0 auto;

        &__copyright {
          @include flex(0 0 auto);
          text-align: inherit;
          padding-right: 1rem;
          margin-right: 1rem;
          margin-bottom: inherit;
          border-right: 1px solid #ffffff;
        }
      }


      .social-icons {
        text-align: inherit;

        &__item {
          float: left;
          display: inherit;
        }
      }
    }
  }
</style>
