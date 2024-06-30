<!-- client/src/App.vue -->
<template>
  <div id="app">
    <header>
    </header>
    <main>
      <LiveEditor />
      <br>
      <DoktorskiStudij />
      <br>
      <PraktikumiRez />
      <br>
      <SnimanjaRez />
    </main>
  </div>
</template>

<script>
import LiveEditor from './components/LiveEditor.vue';
import DoktorskiStudij from './components/DoktorskiStudij.vue';
import PraktikumiRez from './components/PraktikumiRez.vue';
import SnimanjaRez from './components/SnimanjaRez.vue';

export default {
  name: 'App',
  components: {
    LiveEditor,
    DoktorskiStudij,
    PraktikumiRez,
    SnimanjaRez,
  },
};
</script>

<style>
#app {
  font-family: Arial, Helvetica, sans-serif;
}

header {
}

main {
  margin: 0 auto;
}
</style>
