const CompareCards = class CompareCards {
    constructor({classes, headerNumbers, bodyText, smallText = null}){
        this.classes = classes ?? 'indigo text-white'
        this.headerNumbers = headerNumbers ?? '0'
        this.bodyText = bodyText ?? ''
        this.smallText = smallText
    }
}

export default CompareCards