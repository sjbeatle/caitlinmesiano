<template>
  <h2><span>{{ msg }}</span></h2>
</template>

<script>
export default {
  name: 'goodbye',
  data() {
    return {
      msg: 'Goodbye',
    };
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
h2 {
  span {
    font-weight: bold;
  }
}
</style>
