
new Vue({
    el: '#app',
    data: {
        form: new Form({
            name: '',
            description: '',
        }),
    },
    methods: {
        onSubmit() {
            this.form.submit('post', '/projects')
                .then((data) => {
                    alert('Handling it!');
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
});
