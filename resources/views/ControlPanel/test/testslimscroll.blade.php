<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>slim scroll demo</title>
        <script src="{{asset('slimscroll/slimScroll.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('slimscroll/slimScroll.css')}}" />
        <script>
            window.onload = function(){
                if(!navigator.userAgent.match('Macintosh')){
                    var element = document.querySelectorAll('.slimScroll');


                    // Apply slim scroll plugin
                    var one = new slimScroll(element[0], {
                        'wrapperClass': 'scroll-wrapper unselectable mac',
                        'scrollBarContainerClass': 'scrollBarContainer',
                        'scrollBarContainerSpecialClass': 'animate',
                        'scrollBarClass': 'scroll',
                        'keepFocus': true
                    });
                    var two = new slimScroll(element[1], {
                        'wrapperClass': 'wrapper',
                        'scrollBarContainerClass': 'scrollBarContainer',
                        'scrollBarClass': 'scrollBar'
                    });

                    var three = new slimScroll(element[2], {
                        'wrapperClass': 'scroll-wrap',
                        'scrollBarContainerClass': 'scroll-bar-wrap',
                        'scrollBarClass': 'scroll-bar'
                    });

                    // resize example
                    // To make the resizing work, set the height of the container in PERCENTAGE
                    window.onresize = function(){
                        one.resetValues();
                        two.resetValues();
                        three.resetValues();
                    }
                }
                else{
                    document.write("For Mac users, this custom slimscroll styles will not be applied");
                }
            }
        </script>
    </head>
    <body>
        <a href="http://uxrim.com/slim-scroll">Visit Website</a>
        <br />
        <div class="slimScroll">
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
        </div>

        <div class="slimScroll">
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
        </div>

        <div class="slimScroll">
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
            Lorem ipsum dolor sit amet, ne eos utinam impetus legimus, vide omnis nusquam eam te. Impetus mediocritatem eu mea. Nisl oblique salutandi no cum. Ei pro everti periculis. Ne per ignota delenit, vis officiis indoctum urbanitas no, accusata torquatos incorrupte at per. At mei soluta sanctus contentiones, eam id sint molestie scriptorem. An tation contentiones eum. Nec id offendit facilisi, ex eligendi gubergren eum, ne libris commune est. Modus labitur patrioque quo cu, eu mei altera integre eleifend, ea quod abhorreant vix. Per eu errem saepe nusquam. Ne congue splendide vim, pri ad vocibus omittam assentior. Cu nam eirmod ocurreret, partem intellegam est et. Illum aliquam legendos at sed, ne idque fastidii apeirian vix. Sed nisl libris delectus ei. Percipit oporteat philosophia et vel, liber deterruisset eu his, paulo mentitum te his. Et duo paulo iudicabit, voluptua placerat ea mei. Quo ea ponderum omittantur referrentur. At homero bonorum nominati has, suas comprehensam eum in. At meis lobortis cum. Diam ipsum consulatu pro no, wisi nullam labores mel an, pro error integre molestiae te. Scripta accommodare sea in, has ne error viris. Erat qualisque eu vim, an atqui vivendo forensibus usu. Iisque petentium ad cum.
        </div>
    </body>
</html>
