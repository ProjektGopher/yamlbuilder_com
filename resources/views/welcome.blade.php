<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen antialiased leading-none bg-gray-100">
<div class="flex flex-col">
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col justify-around h-full" x-data="{ open: false }">
            <div>
                <h1 class="mb-6 text-5xl font-light tracking-wider text-center text-gray-600">
                    YAML Builder
                </h1>
                <ul class="text-center list-reset">
                    <li class="inline pr-8">
                        <a href="#" class="text-sm font-normal text-teal-800 no-underline uppercase hover:underline" title="Documentation">Documentation</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="text-sm font-normal text-teal-800 no-underline uppercase hover:underline" title="Validate">Validate YAML</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="text-sm font-normal text-teal-800 no-underline uppercase hover:underline" title="Examples">Examples</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="" class="text-sm font-normal text-teal-800 no-underline uppercase hover:underline" title="Drivers">Available Drivers</a>
                    </li>
                    <li class="inline pr-8">
                        <a href="https://github.com/ProjektGopher/yamlbuilder_com" class="text-sm font-normal text-teal-800 no-underline uppercase hover:underline" title="GitHub">GitHub</a>
                    </li>
                </ul>
            </div>
            <div class="mt-6 text-sm font-light text-center text-gray-500">
                This open source project is hosted and maintained by <a href="https://projektgopher.com" target="_blank" class="font-bold text-purple-500 hover:underline hover:text-gray-800">Projekt Gopher Multimedia</a>
            </div>

            <div x-show="open" @click.away="open = false">
                <p class="mx-auto mt-8 text-lg font-bold text-center text-gray-800 uppercase "><span class="text-gray-500">Paste this into:</span> blueprint.yaml</p>
                <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)" class="w-full p-8 m-auto mt-8 border-2 border-gray-700 border-dashed min-h-64">
<pre><code>models:
  Post:
    title: string:400
    content: longtext
    published_at: nullable timestamp

controllers:
  Post:
    index:
      query: all
      render: post.index with:posts

    store:
      validate: title, content
      save: post
      send: ReviewNotification to:post.author with:post
      dispatch: SyncMedia with:post
      fire: NewPost with:post
      flash: post.title
      redirect: post.index</code></pre>
                </div>
            </div>

            <div x-show="!open">
               <p class="mx-auto mt-8 text-lg font-bold text-center text-gray-800 uppercase "><span class="text-gray-500">Building for:</span> Laravel-shift/Blueprint</p>
               <x-drop.dropzone />
               <div class="flex h-4 m-auto mt-8 flex-around">
                   <p class="flex flex-col p-4 m-4 bg-green-200 border-2 border-green-900 rounded-lg" draggable="true" ondragstart="dragstart_handler(event)" id="model" needsName d-accepts="column" d-action="copy">Model</p>
                   <p class="flex flex-col p-4 m-4 bg-red-200 border-2 border-red-900 rounded-lg" draggable="true" ondragstart="dragstart_handler(event)" id="controller" needsName d-accepts="action" d-action="copy">Controller</p>
               </div>

               <h2 class="mt-8">Controller Actions</h2>
               <p class="flex">
                   <x-drop.controller.action id="method.index">Index</x-drop.controller.action>
                   <x-drop.controller.action id="method.create">Create</x-drop.controller.action>
                   <x-drop.controller.action id="method.store">Store</x-drop.controller.action>
                   <x-drop.controller.action id="method.show">Show</x-drop.controller.action>
                   <x-drop.controller.action id="method.edit">Edit</x-drop.controller.action>
                   <x-drop.controller.action id="method.update">Update</x-drop.controller.action>
                   <x-drop.controller.action id="method.destroy">Destroy</x-drop.controller.action>
                   <x-drop.controller.action id="method.custom" needsName>{custom}</x-drop.controller.action>
               </p>

               <h2 class="mt-8">Shorthands</h2>
               <p class="flex">
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.column" d-type="column" d-accepts="column.type, column.modifier" d-action="copy" needsName>New Column</span>
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.shorthand.id">id</span>
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.shorthand.timestamps">timestamps</span>
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.shorthand.timestampstz">timestampsTz</span>
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.shorthand.softdeletes">softDeletes</span>
                    <span class="px-4 py-2 m-2 font-bold text-gray-800 bg-teal-300 border-2 border-teal-700 rounded-full" draggable="true" ondragstart="dragstart_handler(event)" id="model.shorthand.softdeletestz">softDeletesTz</span>
               </p>

               <h2 class="mt-8">Column Types</h2>
               <p class="flex flex-wrap">
                    <x-drop.model.column.type id="model.column.id">id</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.foreignId">foreignId</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.bigIncrements">bigIncrements</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.bigInteger">bigInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.binary">binary</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.boolean">boolean</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.char">char</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.date">date</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.dateTime">dateTime</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.dateTimeTz">dateTimeTz</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.decimal">decimal</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.double">double</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.enum">enum</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.float">float</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.geometry">geometry</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.geometryCollection">geometryCollection</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.increments">increments</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.integer">integer</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.ipAddress">ipAddress</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.json">json</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.jsonb">jsonb</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.lineString">lineString</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.longText">longText</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.macAddress">macAddress</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.mediumIncrements">mediumIncrements</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.mediumInteger">mediumInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.mediumText">mediumText</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.morphs">morphs</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.uuidMorphs">uuidMorphs</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.multiLineString">multiLineString</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.multiPoint">multiPoint</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.multiPolygon">multiPolygon</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.nullableMorphs">nullableMorphs</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.nullableUuidMorphs">nullableUuidMorphs</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.nullableTimestamps">nullableTimestamps</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.point">point</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.polygon">polygon</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.rememberToken">rememberToken</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.set">set</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.smallIncrements">smallIncrements</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.smallInteger">smallInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.softDeletes">softDeletes</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.softDeletesTz">softDeletesTz</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.string">string</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.text">text</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.time">time</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.timeTz">timeTz</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.timestamp">timestamp</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.timestampTz">timestampTz</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.timestamps">timestamps</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.timestampsTz">timestampsTz</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.tinyIncrements">tinyIncrements</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.tinyInteger">tinyInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedBigInteger">unsignedBigInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedDecimal">unsignedDecimal</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedInteger">unsignedInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedMediumInteger">unsignedMediumInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedSmallInteger">unsignedSmallInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.unsignedTinyInteger">unsignedTinyInteger</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.uuid">uuid</x-drop.model.column.type>
                    <x-drop.model.column.type id="model.column.year">year</x-drop.model.column.type>
               </p>

               <h2 class="mt-8">Column Modifiers</h2>
               <p class="flex flex-wrap">
                    <x-drop.model.column.modifier id="model.column.modifier.after">after</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.autoIncrement">autoIncrement</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.charset">charset</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.collation">collation</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.comment">comment</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.default">default</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.first">first</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.nullable">nullable</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.storedAs">storedAs</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.unsigned">unsigned</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.useCurrent">useCurrent</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.virtualAs">virtualAs</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.generatedAs">generatedAs</x-drop.model.column.modifier>
                    <x-drop.model.column.modifier id="model.column.modifier.always">always</x-drop.model.column.modifier>
               </p>
            </div>

            <button class="p-4 m-auto mt-8 font-bold text-gray-700 uppercase border-2 border-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 hover:text-white focus:bg-blue-700" x-show="open" @click.stop="">Copy to Clipboard</button>
            <a class="p-4 m-auto mt-8 font-bold text-gray-700 uppercase border-2 border-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 hover:text-white" x-show="open" @click="open = true">Take me back!</a>
            <a class="p-4 m-auto mt-8 font-bold text-gray-700 uppercase border-2 border-gray-700 rounded-lg cursor-pointer hover:bg-gray-600 hover:text-white" x-show="!open" @click="open = true">Show me the Yaml!</a>


        </div>
    </div>

<script>
    function accepts(accepts, type) {
        console.log('Item accepts ' + accepts + '. Type of ' + type + ' given.')
        return accepts.includes(type)
    }

    function dragstart_handler(ev) {
        // Add this element's id to the drag payload so the drop handler will know which element to add to its tree
        node = ev.target
        ev.dataTransfer.setData("text", ev.target.id);

        if(action = ev.target.getAttribute('d-action')) {
            console.log('Element has d-action attribute of ' + action)
            // if(action == 'copy'){
            //     ev.dataTransfer.effectAllowed = "copy";
            //     ev.dataTransfer.dropEffect = "copy";
            // } else {
            //     ev.dataTransfer.effectAllowed = "move";
            //     ev.dataTransfer.dropEffect = "move";
            // }
        }
        console.log('grabbed ' + node.id)
        console.log("dragStart: dropEffect = " + ev.dataTransfer.dropEffect + " ; effectAllowed = " + ev.dataTransfer.effectAllowed);
    }

    function drop_handler(ev) {
        ev.preventDefault();
        // ev.dataTransfer.dropEffect = "copy";

        var id = ev.dataTransfer.getData("text");
        target = ev.target;
        node = document.getElementById(id);

        if(target.hasAttribute('d-accepts')){
            if(!node.hasAttribute('d-type')){
                console.log('A target with d-accepts attribute requires new node to have d-type attribute');
                return;
            }
            if(!accepts(target.getAttribute('d-accepts'), node.getAttribute('d-type'))){
                console.log('types dont match');
                return;
            }
            console.log('Has d-accepts attribute')
        }

        name = node.hasAttribute('needsName') ? window.prompt('Let\'s give this thing a name!') : node.innerText


        if(node.getAttribute('d-action') === 'copy'){
            var nodeCopy = node.cloneNode(true);
            nodeCopy.id = nodeCopy.id + '.' + Date.now();
            target.appendChild(nodeCopy);
            document.getElementById(nodeCopy.id).innerText = name;
        } else if(node.getAttribute('d-action') === 'copy then move'){
            var nodeCopy = node.cloneNode(true);
            nodeCopy.id = nodeCopy.id + '.' + Date.now();
            target.appendChild(nodeCopy);
            document.getElementById(nodeCopy.id).innerText = name;
            document.getElementById(nodeCopy.id).setAttribute('d-action', 'move');
        } else {
            target.appendChild(node);
        }
        

        console.log("drop: dropEffect = " + ev.dataTransfer.dropEffect + " ; effectAllowed = " + ev.dataTransfer.effectAllowed);
    }

    function dragover_handler(ev) {
        ev.preventDefault();
        
        // Set the dropEffect to copy
        // ev.dataTransfer.dropEffect = "copy"

        console.log("dragOver: dropEffect = " + ev.dataTransfer.dropEffect + " ; effectAllowed = " + ev.dataTransfer.effectAllowed);
    }
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</body>
</html>
