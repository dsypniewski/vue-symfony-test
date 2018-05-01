const state = {
	breadcrumbs: [],
};

const getters = {
	get: (state) => state.breadcrumbs,
};

const actions = {};

const mutations = {
	set: (state, value) => state.breadcrumbs = value,
};

export default {
	namespaced: true,
	state,
	getters,
	actions,
	mutations,
}
