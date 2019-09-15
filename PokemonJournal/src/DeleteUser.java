import java.awt.*;
import java.awt.event.*;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.swing.*;
import javax.swing.JOptionPane;
import java.sql.PreparedStatement;

public class DeleteUser extends JFrame implements ActionListener  {
    JLabel Header = new JLabel("Delete User");
    JLabel Username = new JLabel("Username:");
    JTextField UsernameText = new JTextField(15);
    JCheckBox TnC = new JCheckBox("I agree to T&C");
    JButton Delete = new JButton("Delete");
    JButton Reset = new JButton("Reset");
    JButton Exit = new JButton("Exit");
    DBHandler db = new DBHandler();
    
    DeleteUser(){
        setLayout(new BorderLayout());
        setSize(500,500);
        setResizable(false);
        setLocationRelativeTo(null);
        setTitle("Delete User");
        JPanel North = new JPanel();
        North.setLayout(new FlowLayout(FlowLayout.CENTER));
        North.setBackground(Color.YELLOW);
        Header.setFont(new Font("Arial Black",Font.PLAIN,32));
        North.add(Header);
        JPanel Center = new JPanel();
        Center.setLayout(new GridLayout(5,1));
        JPanel Center1 = new JPanel();
        Center1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Username.setFont(new Font("Arial Black",Font.PLAIN,12));
        Username.setPreferredSize(new Dimension(80,50));
        Center1.add(Username);
        Center1.add(UsernameText);
        JPanel Center2 = new JPanel();
        Center2.setLayout(new FlowLayout(FlowLayout.CENTER));
        TnC.setFont(new Font("Arial Black",Font.PLAIN,12));
        Center2.add(TnC);
        Center.add(Center1);
        Center.add(Center2);
        
        JPanel South = new JPanel();
        South.setLayout(new GridLayout(2,1));
        JPanel South1 = new JPanel();
        South1.setLayout(new FlowLayout(FlowLayout.CENTER));
        Delete.setFont(new Font("Arial Black",Font.PLAIN,12));
        Reset.setFont(new Font("Arial Black",Font.PLAIN,12));
        Exit.setFont(new Font("Arial Black",Font.PLAIN,12));
        Delete.setPreferredSize(new Dimension(100,40));
        Reset.setPreferredSize(new Dimension(100,40));
        Exit.setPreferredSize(new Dimension(100,40));
        South1.add(Delete);
        JPanel South2 = new JPanel();
        South2.setLayout(new FlowLayout(FlowLayout.CENTER));
        South2.add(Reset);
        South2.add(Exit);
        South.add(South1);
        South.add(South2);
        add("North",North);
        add("Center",Center);
        add("South",South);
        setVisible(true);
        
        Delete.addActionListener(this);
        Reset.addActionListener(this);
        Exit.addActionListener(this);
        UsernameText.addActionListener(this);
        TnC.addActionListener(this);
        
    }
    public void actionPerformed(ActionEvent e){
        if(e.getSource() == Exit){
            System.exit(0);
        }
        if(e.getSource() == Reset){
            UsernameText.setText("");
            TnC.setSelected(false);
        }
        
        if(e.getSource() == Delete){
            String username = UsernameText.getText();
            
            if(username.equals("")){
                JOptionPane.showMessageDialog(null,"Please enter the username that want to delete.","Warning",JOptionPane.ERROR_MESSAGE);
            }
            else{
                if(TnC.isSelected()){
                 db.DeleteUser(username);
                }
                else
                    JOptionPane.showMessageDialog(null,"Please agree to the T&C.","Alert",JOptionPane.ERROR_MESSAGE);
            }
        }
    }
            
class DBHandler {
    private Statement myStatement;

public DBHandler() {
        try { 
                
            Class.forName("net.ucanaccess.jdbc.UcanaccessDriver");
            String url = 
               "jdbc:ucanaccess://PokemonUserID.accdb";
        
            Connection PokemonUserID = DriverManager.getConnection(url, "admin", ""); 
            
            
             myStatement = PokemonUserID.createStatement();
             
            
        }
        
        catch (ClassNotFoundException cnfe) {
            out.println(cnfe);
        }
        catch (SQLException sqle) {
            out.println(sqle);
        }
    }

   
    public void DeleteUser(String username) {
       String array[] = {username};
        try {
           String url = 
              "jdbc:ucanaccess://PokemonUserID.accdb";
        
            Connection PokemonUserID = DriverManager.getConnection(url, "admin", ""); 
            String deleteString = 
                    "DELETE FROM UserID WHERE Username =?";
            PreparedStatement pst = PokemonUserID.prepareStatement(deleteString);
            pst.setString(1,array[0]);
            
            int confirmation = JOptionPane.showConfirmDialog(null,"Are you sure to delete " + array[0] + "?","Confirmation",JOptionPane.YES_NO_OPTION);
            if(confirmation == JOptionPane.YES_OPTION){
     
            pst.executeUpdate();
            JOptionPane.showMessageDialog(null,"User Deleted");
                
            }
            else{
            UsernameText.setText("");
            TnC.setSelected(false);
            }
            
            }
            
         
        catch (SQLException sqle) {
            JOptionPane.showMessageDialog(null,"Delete Unsucessfully");
            
        }
        
        
            
        
        
            }
}
        }
    


        
    

