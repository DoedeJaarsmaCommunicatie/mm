<template>
    <form @submit.prevent="submitForm" id="mailchimp-form">
        <aside v-if="error" class="border-l-2 error pl-2 my-2">
            <p class="font-bold">Foutje!</p>
            <p class="text-sm">
                {{ error }}
            </p>
        </aside>
        <aside v-if="success" class="border-l-2 success pl-2 my-2">
            <p class="font-bold">Gelukt!</p>
            <p class="text-sm">
                {{ success }}
            </p>
        </aside>
        
        <input type="text" v-model="firstName" placeholder="Voornaam" />
        <input type="text" v-model="name" placeholder="Achternaam" />
        <input type="email" v-model="email" placeholder="E-mailadres" />
        <button type="submit" class="button">
            Aanmelden
        </button>
    </form>
</template>

<script>
import Vue from 'vue';
import Component from 'vue-class-component';

const PropsVue = Vue.extend({
    props: {
        mckey: {
        	type: String,
            default: '',
        }
    }
});

@Component
export default class FormView extends PropsVue {
	email = null;
	name = null;
	firstName = null;
	
	error = false;
	success = false;
	
	submitForm() {
		this.error = false;
		
		if (!this.email) {
			this.error = 'Er is geen e-mail ingevuld.';
            return;
        }
		
		this.success = 'Bedankt voor je aanmelding!';
    }
}
</script>

<style scoped lang="scss">
#mailchimp-form {
    background: #ffffff;
    /*border-radius: 5px;*/
    padding: 2rem;
    display: flex;
    flex-direction: column;
    position: relative;
    border-bottom-left-radius: 0;
    
    > input {
        border-bottom: 1px solid #8797A0;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        margin-bottom: 1rem;
        color: #FC8D11;
        
        &::placeholder {
            color: #FC8D11;
            opacity: 1;
        }
    }
    
    &:after {
        content: ' ';
        position: absolute;
        border-style: solid;
        border-width: 2rem 2rem 0 0;
        border-color: #ffffff transparent transparent transparent;
        top: 100%;
        left: 0;
    }
}
.success {
    border-color: green;
}
.error {
    border-color: red;
}
</style>
