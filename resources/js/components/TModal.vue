<template>
<div class="main-window" v-if="show" >
  <div class="card" @clickoutside="modal('hide')">
    <div class="card-header">
      <button class="btn" @click="modal('hide')">X</button>
      <h4>{{title}}</h4>
    </div>
    <div class="card-body">
      <slot></slot>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "TModal",
  props:['title'],
  data(){
    return {
     show:false,
    };
  },
  methods:{
    modal(op = toggle){
      switch (op){
        case 'show':
          this.show = true;
          break;
        case 'hide':
          this.show = false;
          break;
        case 'toggle':
          this.show =! this.show;
          break;
      }
      this.$forceUpdate();
    },

  }
}
</script>

<style scoped>
  .main-window{
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    background-color: #00000061;
    z-index: 10000;
    padding: 10rem 33rem;
    justify-content: center;
    text-align: center;
  }
  .card{
    height: 100%;
  }
  .card-header button{
    float: right;
  }
</style>