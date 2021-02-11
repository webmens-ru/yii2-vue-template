<template>
  <Loader v-if="loading"></Loader>
  <div v-else class="main">
    <div class="row">
      <div class="col-12">
        <el-button type="primary" @click="showModal = true">Добавить платёж</el-button>
      </div>
    </div>
    <div id="table-income-row">
      <h2 id="row-title-income">Доходы</h2>
      <Table table-type="Факт" :datas="incomeFact" @tableSum="factIncome"></Table>
      <Table table-type="План" :datas="incomePlan" @tableSum="planIncome"></Table>
    </div>
    <div id="table-cost-row">
      <h2 id="row-title-cost">Расходы</h2>
      <Table table-type="Факт" :datas="costFact" @tableSum="factCost"></Table>
      <Table table-type="План" :datas="costPlan" @tableSum="planCost"></Table>
    </div>
    <div class="row justify-content-between">
      <div class="col-6">
        <p class="total-sum">Баланс (факт):
          <br>
          <span class="total-sum-number">{{ addSeparator(factTotal) }} руб.</span>
        </p>
      </div>
      <div class="col-6">
        <p class="total-sum">Баланс (План):
          <br>
          <span class="total-sum-number">{{ addSeparator(planTotal) }} руб.</span>
        </p>
      </div>
    </div>
  </div>
  <Modal v-model="showModal" @create-payment="createPayment"></Modal>
</template>

<script>
import 'element-plus/lib/theme-chalk/index.css';
import axios from 'axios';
import qs from 'qs';
import Table from "./components/Table.vue";
import Loader from "./components/Loader.vue";
import Main from "./components/Modal/Main.vue"

export default {
  name: 'App',
  components: {
    Table, Loader,
    'Modal': Main
  },
  data() {
    return {
      loading: true,
      showModal: false,
      model: null,
      factsSum: {
        income: null,
        cost: null
      },
      planSum: {
        income: null,
        cost: null
      }
    }
  },
  methods: {
    factIncome(data) {
      console.log(data)
      this.factsSum.income = data;
    },
    factCost(data) {
      this.factsSum.cost = data;
    },
    planIncome(data) {
      this.planSum.income = data;
    },
    planCost(data) {
      this.planSum.cost = data;
    },
    createPayment(event) {
      this.showModal = false;
      const submitData = event;
      console.log(submitData);
      let obj = {
        type: submitData.paymentType,
        plan_fact: submitData.planOrFact,
        date: submitData.paymentDate,
        summ: submitData.paymentSum,
        deal_id: submitData.b24DealId,
        article_id: submitData.articleType,
        comment: submitData.comment
      }
      // const str = JSON.stringify(obj);
      // console.log('str: ', str)
      axios.post('http://yii-vue/web/vue/set-data', qs.stringify(obj))
          .then((response) => {
            console.log(response);
          })
          .catch((error) => {
            console.log(error);
          });
    },
    addSeparator(value) {
      let result = parseFloat(value).toLocaleString('ru-RU', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      }).replace(',', '.');
      return result;
    },
  },
  computed: {
    factTotal: function () {
      let result = this.factsSum.income - this.factsSum.cost;
      return result;
    },
    planTotal: function () {
      let result = this.planSum.income - this.planSum.cost;
      return result;
    },
    incomeFact: function () {
      let result = this.model.data.filter(item => item.type == 1 && item.plan_fact == 2);
      return result;
    },
    incomePlan: function () {
      let result = this.model.data.filter(item => item.type == 1 && item.plan_fact == 1);
      return result;
    },
    costFact: function () {
      let result = this.model.data.filter(item => item.type == 2 && item.plan_fact == 2);
      return result;
    },
    costPlan: function () {
      let result = this.model.data.filter(item => item.type == 2 && item.plan_fact == 1);
      return result;
    }
  },
  mounted() {
    axios
        .get('http://yii-vue/web/vue/get-data')
        .then(response => {
          this.model = response
          console.log(this.model)
          this.loading = false
        });
  }
}
</script>

<style>
#table-income-row {
  border: 2px solid #9dcf00;
  margin-top: 20px;
  border-radius: 5px;
}

#table-cost-row {
  border: 2px solid darkgrey;
  margin-top: 20px;
  border-radius: 5px;
}

#row-title-income, #row-title-cost {
  font-weight: bold;
  font-size: 100%;
  text-transform: uppercase;
  padding: 8px 30px;
  border-bottom: 2px solid #eef2f4;
  margin: 0;
  color: #fff;
}

#row-title-income {
  background-color: #9dcf00;
}

#row-title-cost {
  background-color: darkgrey;
}

.total-sum {
  float: left;
  width: 50%;
}

.total-sum-number {
  font-size: 30px;
  line-height: 1em;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*text-align: center;*/
  color: #2c3e50;
  margin-top: 60px;
}
</style>
