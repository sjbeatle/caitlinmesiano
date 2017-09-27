<template>
  <h2>{{ msg }}</h2>
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
<style>
h2 {
  font-weight: normal;
}
</style>
