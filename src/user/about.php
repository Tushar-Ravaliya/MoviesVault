        <?php
        include("Nevigation.php");
        include("../../config/connection.php");
        // Fetch aboutus content
        $fetch_query = "SELECT * FROM aboutus_content WHERE id = 1";
        $result = mysqli_query($conn, $fetch_query);
        $aboutus_content = mysqli_fetch_assoc($result);

        // If no content exists, use default
        if (!$aboutus_content) {
            $aboutus_content = [
                'title' => 'Welcome to Our Site',
                'content' => 'This is the default aboutus content. Please set up your aboutus content from the admin panel.',
                'image_path' => 'default_image.jpg'
            ];
        }
        ?>
        <section class="py-24 relative">
            <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                <div class="w-full justify-start items-center gap-8 grid lg:grid-cols-2 grid-cols-1">
                    <div class="w-full flex-col justify-start lg:items-start items-center gap-10 inline-flex">
                        <div class="w-full flex-col justify-start lg:items-start items-center gap-4 flex">
                            <h2 class="text-gray-900 text-4xl font-bold font-manrope leading-normal lg:text-start text-center"> <?php echo htmlspecialchars($aboutus_content['title']); ?>
                            </h2>
                            <p class="text-gray-500 text-base font-normal leading-relaxed lg:text-start text-center">At <?php echo nl2br(htmlspecialchars($aboutus_content['content'])); ?></p>
                        </div>
                        <a href="index.php" class="sm:w-fit w-full px-3.5 py-2 bg-red-600 hover:bg-red-800 transition-all duration-700 ease-in-out rounded-lg shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] justify-center items-center flex">
                            <span class="px-1.5 text-white text-sm font-medium leading-6">Get Started</span>
                        </a>
                    </div>
                    <img class="lg:mx-0 mx-auto h-full rounded-3xl object-cover" src="../../public/Images/<?php echo htmlspecialchars($aboutus_content['image_path']); ?>" alt="about Us image" />
                </div>
            </div>
        </section>
        <?php
        include("Footer.php")
        ?>