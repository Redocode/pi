<!-- resources/views/projects/edit.blade.php -->

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
            <?php echo e(__('Edit Project')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Edit Project Form -->
                    <form action="<?php echo e(route('projects.update', $project->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Client ID Field -->
                        <div class="mb-4">
                            <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Client:</label>
                            <select name="client_id" id="client_id" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($client->id); ?>" <?php echo e($client->id == $project->client_id ? 'selected' : ''); ?>><?php echo e($client->nom); ?> <?php echo e($client->prenom); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Numero Projet Field -->
                        <div class="mb-4">
                            <label for="numero_projet" class="block text-gray-700 text-sm font-bold mb-2">Numero Projet:</label>
                            <input type="text" name="numero_projet" id="numero_projet" value="<?php echo e($project->numero_projet); ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Createur ID Field (Hidden) -->
                        <input type="hidden" name="createur_id" value="<?php echo e($project->createur_id); ?>">

                        <!-- Date Creation Field -->
                        <div class="mb-4">
                            <label for="date_creation" class="block text-gray-700 text-sm font-bold mb-2">Date Creation:</label>
                            <input type="date" name="date_creation" id="date_creation" value="<?php echo e($project->date_creation); ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Nom Projet Field -->
                        <div class="mb-4">
                            <label for="nom_projet" class="block text-gray-700 text-sm font-bold mb-2">Nom Projet:</label>
                            <input type="text" name="nom_projet" id="nom_projet" value="<?php echo e($project->nom_projet); ?>" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6">
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="shadow appearance-none border rounded py-4 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/6"><?php echo e($project->description); ?></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                        </div>
                    </form>
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
<?php /**PATH C:\Users\Kdp\Desktop\leaflet-master\resources\views/projects/edit.blade.php ENDPATH**/ ?>