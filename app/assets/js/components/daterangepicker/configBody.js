const ConfigBody = (begin, end, position = 'left', format = 'YYYY-MM-DD') => {
    const today = new Date()
    if(!begin){
        begin = `${today.getFullYear()}-${(today.getMonth()+1)}-${today.getDate()}`
    }
    if(!end){
        end = `${today.getFullYear()}-${(today.getMonth()+1)}-${today.getDate()}`
    }

    return {
        opens: position,
        startDate: begin,
        endDate: end,
        locale: {
            format: format
        }
    }
}

export default ConfigBody

