<template>
    <div class="mt-5">
        <h1>Formularios</h1>

        <form>
            <b-row>
                <!-- Columna 1 -->
                <b-col md="3">
                    <b-form-input type="text" v-model="texto" :state="comprobar"></b-form-input>
                    <small>Mínimo 3 carácteres</small>
                </b-col>  
                <!-- Columna 2 -->
                <b-col md="3">
                    <b-form-select v-model="select" :options="animales"></b-form-select>
                    <p>Selección: {{select}}</p>
                </b-col> 
                <!-- Columna 3 -->
                <b-col md="3">
                    <b-form-radio-group v-model="radio" :options="animalesRadio"></b-form-radio-group>
                    <p>Radio: {{radio}}</p>
                </b-col> 
                <!-- Columna 4 -->
                <b-col md="3">
                    <b-form-checkbox-group v-model="check" :options="animalesRadio"></b-form-checkbox-group>
                    <p>Múltiple: {{check}}</p>
                </b-col> 
                </b-row>
        </form>

        <p>Texto: {{texto}}</p>
        
    </div>
</template>

<script>
export default {
    name: 'Form',
    data(){
        return {
            texto: '',
            check: [],
            radio: null,
            select: null,
            animales:[
                {value: null, text: 'Seleccione un animal'},
                {value: 'perro', text: 'Guau guau'},
                {value: 'gato', text: 'Miau'},
                {value: 'pato', text: 'Cuak'}
            ],
            animalesRadio:[
                {value: 'perro', text: 'Guau guau'},
                {value: 'gato', text: 'Miau'},
                {value: 'pato', text: 'Cuak'}
            ]
        }
    },
    computed: {
        comprobar(){
            return this.texto.length > 2 ? true : false
        }
    }
}
</script>