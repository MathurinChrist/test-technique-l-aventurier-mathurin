<template>
    <div class="space-y-6 p-6">
        <h1 class="text-2xl font-bold">Liste des sacs</h1>

        <small v-if="backpacks.length === 0"> Aucun sac enregistré</small>
        <table v-else>
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
<!--                         refactor this not to by adding backpackListItem and use emit or other way-->
                            Voir
                        </Link>
                     </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const backpacks = page.props.backpacks.map(b => ({
    ...b,
    href: `/backpacks/${b.id}`
})) || [];

console.log('le sac devient après ajout du href', backpacks)

</script>

<style scoped>
table {
    width: 100%;
}
th,
td {
    text-align: left;
}
</style>
