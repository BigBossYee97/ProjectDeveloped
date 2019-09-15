import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;
import java.sql.PreparedStatement;
public class DeletePokestop extends JFrame implements ActionListener{
    JLabel Header = new JLabel("Delete Pokestop");
    JLabel ID = new JLabel("Please enter the ID that you want to delete:");
    JLabel FirstName = new JLabel("First Name:");
    JLabel LastName = new JLabel("Last Name:");
    JLabel TeamType = new JLabel("Team Type:");
    JTextField IDText = new JTextField(3);
    JTextField FirstNameText = new JTextField(15);
    JTextField LastNameText = new JTextField(15);
    JComboBox Team = new JComboBox();
    JTextArea PokestopList = new JTextArea(5,60);
    JButton Delete = new JButton("Delete");
    JButton Show = new JButton("Show");
    JButton Reset = new JButton("Reset");
    JButton Exit = new JButton("Exit");
    JScrollPane scroll = new JScrollPane(PokestopList);
    DBHandler db = new DBHandler();
    
    DeletePokestop(){
        setLayout(new BorderLayout());
        setSize(700,700);
        setLocationRelativeTo(null);
        setTitle("Delete Pokestop");
        setResizable(false);
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout(FlowLayout.CENTER));
        North.setBackground(Color.YELLOW);
        Header.setFont(new Font("Arial Black",Font.PLAIN,32));
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(5,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        PokestopList.setEditable(false);
        Center1.add(scroll);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        ID.setFont(new Font("Arial Black",Font.PLAIN,12));
        Center2.add(ID);
        Center2.add(IDText);
        JPanel Center3 = new JPanel();
        Center3.setLayout(new FlowLayout(FlowLayout.CENTER));
        FirstName.setFont(new Font("Arial Black",Font.PLAIN,12));
        FirstName.setPreferredSize(new Dimension(100,40));
        Center3.add(FirstName);
        Center3.add(FirstNameText);
        JPanel Center4 = new JPanel();
        Center4.setLayout(new FlowLayout(FlowLayout.CENTER));
        LastName.setFont(new Font("Arial Black",Font.PLAIN,12));
        LastName.setPreferredSize(new Dimension(100,40));
        Center4.add(LastName);
        Center4.add(LastNameText);
        JPanel Center5 = new JPanel();
        Center5.setLayout(new FlowLayout(FlowLayout.CENTER));
        TeamType.setFont(new Font("Arial Black",Font.PLAIN,12));
        Team.setFont(new Font("Arial Black",Font.PLAIN,12));
        TeamType.setPreferredSize(new Dimension(100,40));
        Team.addItem("None");
        Team.addItem("Valor");
        Team.addItem("Mystic");
        Team.addItem("Instinct");
        Center5.add(TeamType);
        Center5.add(Team);
        
        
        Center.add(Center1);
        Center.add(Center2);
        Center.add(Center3);
        Center.add(Center4);
        Center.add(Center5);
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(2,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Delete.setFont(new Font("Arial Black",Font.PLAIN,12));
        Delete.setPreferredSize(new Dimension(100,40));
        Show.setFont(new Font("Arial Black",Font.PLAIN,12));
        Show.setPreferredSize(new Dimension(100,40));
        South1.add(Show);
        South1.add(Delete);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout(FlowLayout.CENTER));
        Reset.setFont(new Font("Arial Black",Font.PLAIN,12));
        Exit.setFont(new Font("Arial Black",Font.PLAIN,12));
        Reset.setPreferredSize(new Dimension(100,40));
        Exit.setPreferredSize(new Dimension(100,40));
        South2.add(Reset);
        South2.add(Exit);
        South.add(South1);
        South.add(South2);
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        Show.addActionListener(this);
        Delete.addActionListener(this);
        Reset.addActionListener(this);
        Exit.addActionListener(this);
        IDText.addActionListener(this);
        FirstNameText.addActionListener(this);
        LastNameText.addActionListener(this);
        Team.addActionListener(this);
    }
public void actionPerformed(ActionEvent e){
    
    if(e.getSource() == Delete){
            db.DeletePokestop();
        }
        
        if(e.getSource() == Show){
            db.getPokestop();
        }
        
        if(e.getSource() == Exit){
            System.exit(0);
        }
        
        if(e.getSource() == Reset){
            Team.setSelectedIndex(0);
            FirstNameText.setText("");
            LastNameText.setText("");
            IDText.setText("");
            PokestopList.setText("");
        }
}
class DBHandler {
    private Statement myStatement;

public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonHunter.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public void getPokestop() {
       String firstname = FirstNameText.getText();
       String lastname = LastNameText.getText();
   
       if(firstname.equals("") && lastname.equals("")){
            JOptionPane.showMessageDialog(null,"Please enter the first name and last name to get the Pokemon List","Alert",JOptionPane.INFORMATION_MESSAGE);
        }
       PokestopList.setText("");
       boolean CheckUser = false;
        try {
           
            PokestopList.append("        ID\tPokestop\tDate\tTime\tItem" + "\n");
            PokestopList.append("________________________________________________________________________________________________\n");
            
            ResultSet results = myStatement.executeQuery
                ("SELECT * FROM Pokestop");
            while (results.next()) {
               String array[] = {results.getString("ID"),results.getString("FirstName"),results.getString("LastName"),results.getString("TeamType"),results.getString("PokestopVisited"),results.getString("DateVisit"),results.getString("Time"),results.getString("Item")};
               
                if(firstname.equals(array[1]) && lastname.equals(array[2]) && Team.getSelectedItem().equals(array[3])){
                    PokestopList.append("        " + array[0] + "\t");
                    PokestopList.append(array[4] + "\t");
                    PokestopList.append(array[5] + "\t");
                    PokestopList.append(array[6] + "\t");
                    PokestopList.append(array[7] + "\n");
                    CheckUser = true;
                }
     
                     
            }
            if(CheckUser == false && !firstname.equals("") && !lastname.equals("")){
                JOptionPane.showMessageDialog(null,"Invalid User");
            }
            
            results.close();
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
}
    
    public void DeletePokestop(){
      String idstr = IDText.getText();
      int id = Integer.parseInt(idstr);
      int array[] = {id};
      if(idstr.equals("")){
          JOptionPane.showMessageDialog(null,"Please enter the ID number that you want to delete.","Alert",JOptionPane.INFORMATION_MESSAGE);
      }
      
      try{
           String url = 
               "jdbc:ucanaccess://PokemonHunter.accdb";
        
            Connection PokemonHunter = DriverManager.getConnection(url, "admin", ""); 
            String DeletePokestop = 
                    "DELETE FROM Pokestop WHERE ID =?";
            PreparedStatement pst = PokemonHunter.prepareStatement(DeletePokestop);
            pst.setInt(1,array[0] );
            int confirmation = JOptionPane.showConfirmDialog(null,"Are you sure to delete this pokestop?","Warning",JOptionPane.YES_NO_OPTION);
            if(confirmation == JOptionPane.YES_OPTION){
            
                pst.executeUpdate();
                JOptionPane.showMessageDialog(null,"Pokestop Deleted","Alert",JOptionPane.INFORMATION_MESSAGE);
            }
            
      }
      catch(SQLException sqle){
          JOptionPane.showMessageDialog(null,"Delete Unsucessfully");
      }
       
    }
}
}
