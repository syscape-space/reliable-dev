<template>
  <t-modal title="بدلات مالية العقد" ref="modal">
    <div class="form-body">
      <div class="form-group" v-for="(term,index) in terms">
        <label class="label text-right">
          بند رقم
          {{index + 1}}
          <button v-if="terms.length > 1" @click="removeTerm(index)" class="btn btn-sm btn-danger">x</button>
        </label>
        <input class="form-control" v-model="terms[index]">
      </div>
      <button class="btn btn-success btn-block" @click="addTerm">اضافة بند</button>
    </div>
  </t-modal>
</template>

<script>
import TModal from "./../TModal";

export default {
  name: "ContractFinancialTermsModal",
  components: {TModal},
  data(){
    return{
      terms:['']
    };
  },
  mounted() {
  },
  methods:{
    modal(op = 'toggle'){
      this.$refs.modal.modal(op);
    },
    addTerm(){
      this.terms.push('');
    },
    removeTerm(index){
      this.terms.splice(index,1);
    },

  }
}
</script>

<style scoped>

</style>