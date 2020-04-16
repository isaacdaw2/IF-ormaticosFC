<template>
    <div class="mt-5 text-center">
        <h1>Contigo seguimos creciendo</h1>
        <h2>¡Hazte socio!</h2>

        <b-row class="mt-5">
            <b-col>
                <b-card img-src="https://picsum.photos/600/300/?image=25" img-top>
                    
                    <b-row>
                        <b-col>
                            <label for="metodoPago">Método de pago:</label>
                        </b-col>
                        <b-col cols="12">
                            <b-button variant="info" class="mr-2 mb-4">Paypal</b-button>
                            <b-button variant="success" class="mr-2 mb-4">Tarjeta crédito/débito</b-button>
                            <b-button variant="danger" class="mb-4">Transferencia bancaria</b-button>
                        </b-col>
                    </b-row>
                </b-card>
            </b-col>            
        </b-row>
    </div>
</template>

<script>
export default {
    name: 'Socio'
}
</script>