const CardInfo = {
    delimiters: ['[[',']]'],
    props: ['classes', 'headernumbers', 'bodytext', 'smalltext'],
    template: `
        <div class="col-lg-3 col-6">
            <div class="small-box" :class="classes">
                <div class="inner">
                    <h3>[[ headernumbers ]]</h3>
                    <p>[[ bodytext ]] <small v-if="smalltext" class="font-italic">[[ smalltext ]]</small></p>
                </div>
            </div>
        </div>
    `
}

export default CardInfo