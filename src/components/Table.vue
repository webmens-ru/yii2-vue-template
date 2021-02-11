<template>
<!--  <div class="table-wrap">-->
<!--    <h3 class="table-summ">-->
<!--      <i class="fas fa-edit"></i>-->
<!--      <span class="table-sum-text">{{ tableType }} | {{ addSeparator(tableSum) }}</span>-->
<!--    </h3>-->
<!--    <table>-->
<!--      <thead>-->
<!--      <tr>-->
<!--        <td>Дата</td>-->
<!--        <td>Сумма</td>-->
<!--        <td>Сделка</td>-->
<!--        <td>Статья</td>-->
<!--        <td>Комментарий</td>-->
<!--        <td></td>-->
<!--      </tr>-->
<!--      </thead>-->
<!--      <tbody>-->
<!--      <tr v-for="item in sortDatas(datas)" :key="item.id">-->
<!--        <td>{{ item.date }}</td>-->
<!--        <td>{{ addSeparator(item.summ) }}</td>-->
<!--        <td><a :href="item.deal_id">{{ item.deal_name }}</a></td>-->
<!--        <td>{{ item.article_id }}</td>-->
<!--        <td>{{ item.comment }}</td>-->
<!--        <td><i class="fas fa-pencil-alt" @click="editRow(item.id)"></i></td>-->
<!--      </tr>-->
<!--      </tbody>-->
<!--    </table>-->
<!--  </div>-->

  <div class="table-wrap">
    <h3 class="table-sum">
      <i class="fas fa-edit"></i>
      <span class="table-sum-text">{{ tableType }} | {{ addSeparator(tableSum) }}</span>
    </h3>
    <el-table :data="sortDatas(datas)">
      <el-table-column prop="date" label="Дата"></el-table-column>
      <el-table-column prop="summ" label="Сумма"></el-table-column>
      <el-table-column prop="deal_name" label="Сделка"></el-table-column>
      <el-table-column prop="article_id" label="Статья"></el-table-column>
      <el-table-column prop="comment" label="Комментарий"></el-table-column>
      <el-table-column fixed="right" label="Operations">
        <template #default="scope">
          <el-button type="warning" size="mini">
            <el-link :href="'https://google.com/' + "></el-link>
          </el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  name: "Table",
  props: {
    tableType: String,
    datas: Array
  },

  methods: {
    editRow(id) {
      alert('Working ' + id);
    },
    sortDatas(data) {
      for (let item in data) {
        this.addSeparator(data[item].summ);
      }
      return data;
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
    tableSum: function () {
      console.log('computing')
      let result = 0;
      for (let item in this.datas) {
        result += this.datas[item].summ;
      }
      this.$emit('tableSum', result);
      return result;
    }
  },
  watch: {}
}
</script>

<style scoped>
.table-wrap {
  box-sizing: border-box;
  display: inline-block;
  width: 50%;
  padding: 10px 15px;
}

#edit-button, .icon-check {
  display: block;
  height: 15px;
  width: 15px;
  background-color: darkseagreen;
}

.table-summ {
  font-weight: bold;
  text-transform: uppercase;
  font-size: 100%;
  margin: 0 0 0 5px;
  color: #535c69;
  min-height: 20px;
}

table {
  box-sizing: border-box;
  width: 100%;
  font-size: 100%;
  font-weight: 300;
  border-spacing: 0;
  margin-top: 20px;
}

thead td {
  font-weight: normal;
  border-bottom: 2px solid #eef2f4;
  padding-bottom: 1px;
}

tbody td {
  border-bottom: 1px solid #eef2f4;
  padding: 4px 5px 0 5px;
}
</style>