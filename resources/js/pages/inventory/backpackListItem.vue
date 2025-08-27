<template>
    <div class="backpack-item space-y-6">
        <div class="p-4 border rounded flex flex-wrap  gap-10">
            <h2 class="font-semibold w-full">Ajouter un item au sac</h2>
            <select v-model="form.type" class="border rounded p-1">
                <option value="" readonly disabled>Sélectionner un type</option>
                <option value="water_bottle">Gourde</option>
                <option value="boussole">Boussole</option>
                <option value="carte">Carte</option>
            </select>
            <input type="number" v-model="form.quantity" min="1" class="border rounded p-1 w-15" />
            <button @click.prevent="addItem" class="bg-blue-500 text-white px-3 py-1 rounded w-400">
                Ajouter
            </button>
        </div>

        <div>
            <table>
                <thead>
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Description</th>
                    <th class="border px-4 py-2">Poids</th>
                    <th class="border px-4 py-2">Quantité</th>
                    <th class="border px-4 py-2">Usure</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td class="border px-4 py-2">{{ item.name }}</td>
                    <td class="border px-4 py-2">{{ item.description }}</td>
                    <td class="border px-4 py-2">{{ item.weight }}</td>
                    <td class="border px-4 py-2">{{ item.quantity }}</td>
                    <td class="border px-4 py-2"> {{ item.wear_factor}}</td>
                    <td class="border px-4 py-2">
                        <button @click.prevent="removeItem(item)" class="bg-red-500 text-white px-2 py-1 rounded">
                            Retirer
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <Link href="/backpacks" class="text-blue-500 text-center border hover:underline"> ← Retour à la liste des sacs</Link>
    </div>
</template>

<script setup lang="ts">
import axios from 'axios';

import { ref } from 'vue';

import { Link } from '@inertiajs/vue3';
import { usePage, router } from '@inertiajs/vue3';

const page = usePage();
const backpack = page.props.backpack || {};
const items = ref(page.props.items || []);

const form = ref({
    type: '',
    quantity: 1
});

const addItem = async () => {
    try {
         await axios.post(`/backpacks/${backpack.id}/update`, {
            type: form.value.type,
            quantity: form.value.quantity
        });

        form.value.type = '';
        form.value.quantity = 1;
        router.visit('/backpacks');
    } catch (error) {
        console.error(error);
        alert('Veuillez revoir les données pour ajouter un sac');
    }
}

const removeItem = async (item) => {
    try {
        const response = await axios.post(`/backpacks/${backpack.id}/remove`, {
            name: item.name,
            quantity: 1
        });

        items.value = response.data.items || [];
        // router.push('/backpacks');
        router.visit('/backpacks');
    } catch (error) {
        console.error(error);
        alert('Erreurrr');
    }
};
</script>

<style scoped>
    .backpack-item {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    table {
        border-spacing: 0;
        width: 100%;
    }

    th, td {
        text-align: left;
    }
    select {
        color: white;
        background-color: darkgray;
    }
</style>
