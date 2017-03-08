<?php
/**
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\PhpEngine $this
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\PhpEngine $view
 * @var \Pimcore\Bundle\PimcoreBundle\Templating\GlobalVariables\GlobalVariables $app
 */

$this->extend('WebsiteDemoBundle::layout.html.php');

?>
<?php
    // set page meta-data
    $this->headTitle()->set($this->article->getTitle());

    $description = strip_tags($this->article->getText());
    $description = \Website\Tool\Text::getStringAsOneLine($description);
    $description = \Website\Tool\Text::cutStringRespectingWhitespace($description, 160);

    // TODO HEAD META HELPER
    // $this->headMeta($description, "description");
?>
<section class="area-wysiwyg">

    <div class="page-header">
        <h1><?= $this->article->getTitle(); ?></h1>
    </div>

    <?= $this->render("WebsiteDemoBundle:Blog:meta.html.php", ['article' => $article]); ?>

    <hr />

    <?php if($this->article->getPosterImage()) { ?>
        <?= $this->article->getPosterImage()->getThumbnail("content")->getHTML() ?>
        <br /><br />
    <?php } ?>

    <?= $this->article->getText(); ?>


    <div class="disqus">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'pimcore'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>

</section>
