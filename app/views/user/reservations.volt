{{ content() }}


<table class="table table-bordered sortable" width="100%">
    <thead>
    <tr class="header">
        <th>Apartment Code</th>
        <th>Start date</th>
        <th>End date</th>
        <th>Number of people</th>
        <th>Total price</th>
        <th>Datum</th>
    </tr>
    </thead>
    <tbody>
     <tr>
    {% for item in reservations %}
            <td>{{ item.code }}</td>
            <td>{{ item.reservation.getStartDate() }}</td>
            <td>{{ item.reservation.getEndDate() }}</td>
            <td>{{ item.reservation.getPeople() }}</td>
            <td>{{ item.reservation.getTotalPrice() }}</td>

            <td> <?php echo $this->tag->linkTo($this->dispatcher->getParam("language")."/user/editBooking/".$item->reservation->getReservationCode(), "Edit") ?> </td>
            <td> <?php echo $this->tag->linkTo($this->dispatcher->getParam("language")."/reservation/delete/".$item->reservation->getReservationCode(), "Delete") ?> </td>


        </tr>
        {% endfor %}
    </tbody>
    </table>

