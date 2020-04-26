<template>
    <div class="mt-5 text-center">
        <h1>Contigo seguimos creciendo</h1>
        <h2>¡Hazte socio!</h2>

        <b-row class="mt-5">
            <b-col>
                <b-card>
                <b-card-img :src="require('../assets/Socios.jpg')"></b-card-img>

                    
                    <b-row>
                        <b-col>
                            <label for="metodoPago">Método de pago:</label>
                        </b-col>
                        <b-col cols="12">
                            <b-button variant="outline-info" class="mr-2 mb-4" v-on:click="pagoPaypal()">Paypal</b-button>
                            <b-button variant="outline-success" class="mr-2 mb-4" v-on:click="pagoTarjeta()">Tarjeta crédito/débito</b-button>
                            <b-button variant="outline-danger" class="mb-4" v-on:click="pagoDomiciliacion()">Domiciliación bancaria</b-button>
                        </b-col>
                    </b-row>

                    <!-- método de pago: Paypal -->                
                <b-card
                    id="paypal"
                    v-show="false"
                    header="Paypal"
                    border-variant="primary"
                    header-bg-variant="primary"
                    header-text-variant="white"
                    align="center">
                    <!-- Correo electrónico paypal-->
                    <b-row>
                        <b-col>
                            Correo electrónico:
                        </b-col>
                        <b-col>
                            <b-form-input type="email" placeholder="Introduce email"></b-form-input>
                        </b-col>
                    </b-row>
                    <!-- Contraseña paypal-->
                    <b-row class="mt-4">
                        <b-col>
                            <b-card-text>Contraseña:</b-card-text>
                        </b-col>
                        <b-col>
                            <b-form-input type="password" placeholder="Introduce contraseña"></b-form-input>
                        </b-col>
                    </b-row>
                </b-card>

                <!-- método de pago: Tarjeta -->                                
                <b-card
                    id="tarjeta"
                    v-show="false"
                    header="Tarjeta crédito/débito"
                    border-variant="success"
                    header-bg-variant="success"
                    header-text-variant="white"
                    align="center">
                    <!-- Número de tarjeta-->
                    <b-row>
                        <b-col>
                            Número de tarjeta:
                        </b-col>
                        <b-col>
                            <b-form-input type="text" placeholder="Introduce el número de la tarjeta"></b-form-input>
                        </b-col>
                    </b-row>
                    <!-- Caducidad tarjeta-->
                    <b-row class="mt-4">
                        <b-col>
                            Caducidad:
                        </b-col>
                        <b-col>
                            <input type="text" size="1" placeholder="Mes"> / 
                            <input type="text" size="4" placeholder="Año">
                        </b-col>
                    </b-row>
                    <!-- CVV tarjeta-->
                    <b-row class="mt-4">
                        <b-col>
                            <b-card-text>Código de seguridad / CVV:</b-card-text>
                        </b-col>
                        <b-col>
                            <b-form-input type="number" placeholder="Introduce CVV"></b-form-input>
                        </b-col>
                    </b-row>
                </b-card>

                <!-- método de pago: Domiciliación -->                
                <b-card
                    id="domiciliacion"
                    v-show="false"
                    header="Domiciliación bancaria"
                    border-variant="danger"
                    header-bg-variant="danger"
                    header-text-variant="white"
                    align="center">
                    <!-- nombre Domiciliación bancaria-->
                    <b-row>
                        <b-col>
                            Titular de la cuenta:
                        </b-col>
                        <b-col>
                            <b-form-input type="text" placeholder="Introduce titular cuenta"></b-form-input>
                        </b-col>
                    </b-row>
                    <!-- Cuenta Domiciliación bancaria -->
                    <b-row class="mt-4">
                        <b-col>
                            <b-card-text>Cuenta bancaria:</b-card-text>
                        </b-col>
                        <b-col>
                            <input type="text" size="4" placeholder="Entidad" class="mb-2"> - 
                            <input type="text" size="4" placeholder="Oficina" class="mb-2"> - 
                            <input type="text" size="1" placeholder="DC" class="mb-2"> - 
                            <input type="text" size="10" placeholder="Nº de cuenta" class="mb-2">                             
                        </b-col>
                    </b-row>
                </b-card>
                    
                    <!-- boton enviar -->
                    <b-row class="mt-3">
                        <b-col>
                            <b-button variant="primary">Enviar</b-button>                 
                        </b-col>                    
                    </b-row>
                </b-card>
            </b-col>            
        </b-row>
    </div>
</template>

<script>
export default {
    name: 'Socio',
    methods: {
        pagoPaypal() {
            if(document.getElementById("paypal").style.display == 'block'){
                return document.getElementById("paypal").style.display = 'none';                 
            } else {
                return (document.getElementById("paypal").style.display = 'block',
                        document.getElementById("tarjeta").style.display = 'none',
                        document.getElementById("domiciliacion").style.display = 'none');
            }            
        },
        pagoTarjeta() {
            if(document.getElementById("tarjeta").style.display == 'block'){
                return document.getElementById("tarjeta").style.display = 'none';
            } else {
                return (document.getElementById("tarjeta").style.display = 'block',
                        document.getElementById("paypal").style.display = 'none',
                        document.getElementById("domiciliacion").style.display = 'none');
            }  
        },
        pagoDomiciliacion() {
            if(document.getElementById("domiciliacion").style.display == 'block'){
                return document.getElementById("domiciliacion").style.display = 'none';
            } else {
                return (document.getElementById("domiciliacion").style.display = 'block',
                        document.getElementById("paypal").style.display = 'none',
                        document.getElementById("tarjeta").style.display = 'none');
            } 
        }        
    }
}
</script>