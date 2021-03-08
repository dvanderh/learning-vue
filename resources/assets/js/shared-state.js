import Vue from 'vue';

const store = {
    user: {
        name: 'John Doe',
    },
};

new Vue({
    el: '#one',
    data: {
        foo: 'bar',
        shared: store,
    },
});

new Vue({
    el: '#two',
    data: {
        foo: 'other bar',
        shared: store,
    },
});
