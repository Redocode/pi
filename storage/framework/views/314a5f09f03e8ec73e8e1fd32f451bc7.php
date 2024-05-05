<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Manage Clients')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Create Client Button -->
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Liste des clients
                    </a>

                    <!-- Client Table -->
                    <table class="table-auto mt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Prenom</th>
                                <th class="px-4 py-2">Societe</th>
                                <th class="px-4 py-2">Telephone</th>
                                <th class="px-4 py-2">Fax</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo e($client->id); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->nom); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->prenom); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->societe); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->telephone); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->fax); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->email); ?></td>
                                <td class="border px-4 py-2"><?php echo e($client->address); ?></td>
                                <td class="border px-4 py-2">
            <!-- Lien pour éditer le client -->
            <a href="<?php echo e(route('clients.edit', $client->id)); ?>" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
            
            <!-- Formulaire de suppression du client -->
            <form id="deleteForm<?php echo e($client->id); ?>" action="<?php echo e(route('clients.destroy', $client->id)); ?>" method="POST" class="inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="button" onclick="confirmDelete(<?php echo e($client->id); ?>, <?php echo e($client->projects()->exists() ? 'true' : 'false'); ?>)" class="text-red-600 hover:text-red-900 ml-2">Supprimer</button>
            </form>
        </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                    </table>

                    <!-- Client Creation Form -->
                    <form action="<?php echo e(route('clients.store')); ?>" method="POST" class="mt-8">
                        <?php echo csrf_field(); ?>
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700 text-sm font-bold mb-2">
                                Nom<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="nom" id="nom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700 text-sm font-bold mb-2">
                                Prenom<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="prenom" id="prenom" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="societe" class="block text-gray-700 text-sm font-bold mb-2">Societe:</label>
                            <input type="text" name="societe" id="societe" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">
                                Telephone<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="telephone" id="telephone" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="fax" class="block text-gray-700 text-sm font-bold mb-2">Fax:</label>
                            <input type="text" name="fax" id="fax" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                Email<span class="text-red-500">*</span>:
                            </label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                                Address<span class="text-red-500">*</span>:
                            </label>
                            <input type="text" name="address" id="address" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" required>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create</button>
                            
                        </div>
                    </form>
                    
        <script>
            function confirmDelete(clientId, hasProjects) {
                if (hasProjects) {
                    if (confirm('Ce client a des projets liés à lui. Vous ne pouvez pas le supprimer avant de supprimer ses projets.')) {
                        document.getElementById('deleteForm' + clientId).submit();
                    }
                } else {
                    if (confirm('Êtes-vous sûr de vouloir supprimer ce client?')) {
                        document.getElementById('deleteForm' + clientId).submit();
                    }
                }
            }
        </script>
                </div>
            </div>
        </div>
    </div>
    
    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Kdp\Desktop\leaflet-master\resources\views/clients/index.blade.php ENDPATH**/ ?>