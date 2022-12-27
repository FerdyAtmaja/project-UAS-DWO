<%@ page session="true" contentType="text/html; charset=ISO-8859-1" %>
  <%@ taglib uri="http://www.tonbeller.com/jpivot" prefix="jp" %>
    <%@ taglib prefix="c" uri="http://java.sun.com/jstl/core" %>


      <jp:mondrianQuery id="query01" jdbcDriver="com.mysql.jdbc.Driver"
        jdbcUrl="jdbc:mysql://localhost/dwouts?user=root&password=" catalogUri="/WEB-INF/queries/dwoadw1.xml">

        select {[Measures].[UnitPrice]} ON COLUMNS,
        {([Salesterritory].[All Territories], [Time].[All Times],[Product].[All Products], [Customer].[All Customers])} ON ROWS
        from [Sales]


      </jp:mondrianQuery>





      <c:set var="title01" scope="session">Query FACT SALES using Mondrian OLAP</c:set>