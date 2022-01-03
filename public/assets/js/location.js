
$(document).ready(() => {
    console.log('readyy');

    $("#autocomplete-search").autocomplete({

        source: (request, response) => {
            return $.ajax({
                url: `/searchlocations/${request.term}`,
                method: 'GET',
                dataType: 'json',
                success: (res) => {
                    result = [];

                    if(res.length !== 0){
                        result = res.map(object => {
                            return {
                                label: object.name,
                                value: `${object.name} (${object.id})`
                            }
                        })
                    }
                    response(result);
                }
            });
        },

        select: (e, selectedData) => {
            console.log(selectedData)

            // $("#autocomplete-search").val(`${selectedData.item.label} (${selectedData.item.value})`);
            // $("#autocomplete-search").val('hello')
        }

    });

});
