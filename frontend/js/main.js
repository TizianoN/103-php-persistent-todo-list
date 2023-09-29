const { createApp } = Vue;

createApp({
  data() {
    return {
      todoItem: '',
      todoList: [],
    };
  },

  methods: {
    updateList() {
      if (this.todoItem) {
        axios
          .post(
            'http://localhost/php-persistent-todo-list/backend/api/store-todo-item.php',
            {
              item: this.todoItem,
            },
            {
              headers: {
                'Content-Type': 'multipart/form-data',
              },
            }
          )
          .then((response) => {
            this.todoList = response.data;
          });

        this.todoItem = '';
      }
    },
  },

  mounted() {
    // console.log(axios);
    axios
      .get(
        'http://localhost/php-persistent-todo-list/backend/api/get-todolist.php'
      )
      .then((response) => {
        this.todoList = response.data;
      });
  },
}).mount('#app');
