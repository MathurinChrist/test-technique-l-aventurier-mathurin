<template>
    <div class="space-y-6 p-6">
        <h1 class="bold text-2xl font-bold">Liste des sacs</h1>

        <div v-if="toastMessage" class="fixed top-4 right-4 rounded bg-green-600 px-4 py-2 text-white shadow-lg">
            {{ toastMessage }}
        </div>
        <button @click="showModal = true" class="rounded bg-blue-600 px-4 py-2 text-white">Ajouter un sac</button>
        <div v-if="showModal" class="flex items-center justify-center">
            <div class="w-96 rounded-lg bg-white p-6 shadow-lg">
                <div class="text-cancel">
                    <h2 class="mb-4 text-xl font-bold text-blue-500">Créer un sac</h2>
                    <p class="mb-4 font-bold text-blue-500" @click.stop="showModal = false">X</p>
                </div>
                <form class="space-y-4">
                    <div class="input-label">
                        <label>Nom</label>
                        <input v-model="form.name" type="text" class="w-full rounded border p-2" required />
                    </div>
                    <div class="input-label">
                        <label class="block font-medium">Poids (kg)</label>
                        <input v-model="form.weight" type="number" step="0.1" class="w-full rounded border p-2" required />
                    </div>
                    <div class="input-label">
                        <label class="block font-medium">Volume (L)</label>
                        <input v-model="form.volume" type="number" step="0.1" class="w-full rounded border p-2" required />
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showModal = false" class="rounded bg-gray-300 px-4 py-2">Annuler</button>
                        <button type="button" @click.prevent="addBackpack" class="rounded bg-blue-600 px-4 py-2 text-white">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <small v-if="backpacks.length === 0"> Aucun sac enregistré</small>
        <table v-if="!showModal && backpacks.length !== 0">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nom</th>
                    <th class="border px-4 py-2">Poids total (kg)</th>
                    <th class="border px-4 py-2">Volume max (L)</th>
                    <th class="border px-4 py-2">Nombre d'items du sac</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="backpack in backpacks" :key="backpack.id">
                    <td class="border px-4 py-2">{{ backpack.name }}</td>
                    <td class="border px-4 py-2">{{ backpack.total_weight }}</td>
                    <td class="border px-4 py-2">{{ backpack.volume }}</td>
                    <td class="border px-4 py-2">{{ backpack.total_items }}</td>
                    <td class="border px-4 py-2">
                        <Link :href="backpack.href" class="text-blue-500">
<!--                         refactor this by adding backpackListItem and use emit or other way-->
                            Voir
                        </Link>
                     </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import axios from 'axios';

import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();

const form = ref({
    name: '',
    weight: '',
    volume: '',
});
const toastMessage = ref('')
const showModal = ref(false);
const backpacks =
    page.props.backpacks.map((b) => ({
        ...b,
        href: `/backpacks/${b.id}`,
    })) || [];

const addBackpack = async () => {
    try {
        await axios.post(`/backpacks`, form.value);

        form.value.name = '';
        form.value.weight = '';
        form.value.volume = '';
        toastMessage.value = 'Sac créé avec succès !';
        // router.visit('/backpacks');
        setTimeout(() => (toastMessage.value = ''), 30000); //todo: this is not working, must be review, may be caused by changing showModal value
        showModal.value = false
    } catch (error) {
        console.error(error);
        alert('Veuillez revoir les données pour créer un sac');
    }
};
</script>

<style scoped>
    table {
        width: 100%;
    }

    th,td {
        text-align: left;
    }
    .text-cancel {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        align-content: center;
        justify-items: center;
    }
    .input-label {
        display: flex;
        flex-direction: column;
        color: #1a202c;
    }
</style>
