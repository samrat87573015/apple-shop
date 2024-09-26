<x-layout.app-layout>
   <x-slider />
   <x-top-category />
   <x-product-tab />
   <x-brand />

    <script>

        (async () => {

            await sliderList();
            await getTopCategoryList();
            $(".preloader").delay(700).fadeOut(700).addClass('loaded');
            await getRemarkAbdID();
        })();

    </script>

</x-layout.app-layout>
