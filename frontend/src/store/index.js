import { createStore } from 'vuex'

const store = createStore({
    state() {
        return {
            cartChangeNumber: 0,
            search: null,
        };
    },
    getters: {
        getCartChangeNumber(state) {
            return state.cartChangeNumber;
        },
    },
    mutations: {
        changeCartChangeNumber(state, cartChangeNumber) {
            state.cartChangeNumber += cartChangeNumber;
        },
    },
    actions: {
        changeCartChangeNumber({ commit }, cartChangeNumber) {
            commit('changeCartChangeNumber', cartChangeNumber);
        },
    }
})

export default store