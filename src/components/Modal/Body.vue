<template>
  <el-form ref="form" :model="form" :rules="rules">
    <el-form-item prop="paymentType">
      <el-select class="form-item" v-model="form.paymentType" clearable placeholder="Доход / Расход">
        <el-option
            v-for="item in paymentTypes"
            :key="item.id"
            :label="item.label"
            :value="item.id">
        </el-option>
      </el-select>
    </el-form-item>

    <el-form-item v-if="form.paymentType" prop="articleType">
      <el-select class="form-item" clearable v-model="form.articleType"
                 :placeholder="form.paymentType == 1 ? 'Статья дохода' : 'Статья расхода'">
        <el-option
            v-for="item in (form.paymentType === 1 ? incomeArticles : costArticles)"
            :key="item.id"
            :label="item.label"
            :value="item.id">
        </el-option>
      </el-select>
    </el-form-item>

    <el-form-item prop="planOrFact">
      <el-select class="form-item" clearable v-model="form.planOrFact" placeholder="План / Факт">
        <el-option :value="1" label="План"></el-option>
        <el-option :value="2" label="Факт"></el-option>
      </el-select>
    </el-form-item>

    <el-form-item prop="paymentDate">
      <el-date-picker
          class="form-item"
          v-model="form.paymentDate"
          type="date"
          placeholder="Дата платежа"
          format="DD.MM.YYYY">
      </el-date-picker>
    </el-form-item>

    <el-form-item prop="paymentSum">
      <el-input placeholder="Сумма платежа" type="number" v-model.number="form.paymentSum">
      </el-input>
    </el-form-item>

    <el-form-item>
      <el-input placeholder="Сделка" v-model="form.b24DealId">
      </el-input>
    </el-form-item>

    <el-form-item>
      <el-input placeholder="Комментарий" v-model="form.comment">
      </el-input>
    </el-form-item>

    <el-form-item>
      <el-button type="success" @click="submitForm('form')">Создать</el-button>
    </el-form-item>


  </el-form>
</template>

<script>
export default {
  name: "Body",
  data() {
    return {
      paymentTypes: [
        {id: 1, label: 'Доход'},
        {id: 2, label: 'Расход'}
      ],
      incomeArticles: [
        {id: 1, label: 'Статья дохода1'},
        {id: 2, label: 'Статья дохода2'}
      ],
      costArticles: [
        {id: 1, label: 'Статья расхода1'},
        {id: 2, label: 'Статья расхода2'}
      ],
      form: {
        paymentType: '',
        articleType: '',
        planOrFact: '',
        paymentDate: new Date(),
        paymentSum: '',
        b24DealId: '',
        comment: ''
      },
      rules: {
        paymentType: [
          { required: true, message: 'Укажите вид платежа', trigger: 'change' }
        ],
        articleType: [
          { required: true, message: 'Выберите нужную статью', trigger: 'change' }
        ],
        planOrFact: [
          {required: true, message: 'Укажите вид платежа', trigger: 'change' }
        ],
        paymentDate: [
          { type: 'date', required: true, message: 'Укажите дату платежа', trigger: 'change' }
        ],
        paymentSum: [
          { type: 'number', required: true, message: 'Укажите сумму платежа', trigger: 'change' }
        ]
      }
    }
  },
  methods: {
    submitForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
          this.showNotify(true)
          this.$emit('submit-payment', this.form)
        } else {
          this.showNotify(false)
          return false;
        }
      });
    },
    showNotify(status) {
      if (status) {
        this.$notify({
          title: 'Успешно!',
          message: 'Новый платёж успешно добавлен',
          type: 'success'
        });
      } else {
        this.$notify({
          title: 'Ошибка!',
          message: 'Данные введены неверно!',
          type: 'warning'
        });
      }
    }
  }
}
</script>

<style scoped>
.form-item {
  width: 100%;
}

.el-row {
  margin-bottom: 20px;
}

input[type='number'] {
  -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
</style>